<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Committee as Committee;
use App\Broadcast as News;
use App\Broadcasts_image as News_image;
use App\Event as Events;
use App\Events_image as Events_image;
use App\Notice as Notices;
use App\Committee_type as Committee_type;

use Session;
use Auth;

class AdminController extends Controller
{

    public function checkCommitteeExistence(Request $request){
        if($request->ajax()){
            $RequestedItem =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
            $RegisteredItem = Committee_type::where('name',$RequestedItem)->first();
            $flag = "true";
            if($RegisteredItem) $flag = "false";
            echo $flag;
        }
    }

    public function storeCommittee(Request $request){
        $committee = new Committee_type();
        $committee->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->description = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->description)));
        $committee->save();
        return redirect()->back();
    }

    public function updateCommittee(Request $request){
        $committee = Committee_type::find($request->id);
        $committee->name = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->description = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->description)));
        $committee->save();
        return redirect()->back();
    }

    public function deleteCommittee(Request $request){
        $committee = Committee_type::find($request->id);
        $committee->delete();
        return redirect()->back();
    }

    public function ShowDashboard(){
        $news = News::with('broadcasts_image')->orderBy('id','DESC')->get();
        $events = Events::with('events_image')->orderBy('id','DESC')->get();
        $notice = Notices::orderBy('id','DESC')->get();
        $committees = Committee_type::with('committee')->orderBy('id','DESC')->get();
        return view('admin.dashboard',['news' => $news, 'events'=>$events, 'notice'=>$notice, 'committees'=>$committees]);
    }

    public function showAddCommitteeMemberForm(){
        $committee = Committee_type::all();
        return view('admin.addCommitteeForm',['committees' => $committee]);
    }

    public function storeCommitteeMemberForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required',
            'status' => 'required',
            'pic' => 'mimes:jpeg,bmp,png,jpg|max:10000'
        ));
        $committee = new Committee();
        $committee->name =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->status = $request->status;
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->designation)));
        $committee->fb = trim($request->fb);
        $committee->g_plus = trim($request->g_plus);
        $committee->twitter = trim($request->twitter);
        $committee->committee_type_id = $request->type;

        if($request->hasFile('pic')){
            $file = $request->file('pic');
            $fileName = time().$request->file('pic')->getClientOriginalName();
            $file->move(public_path('/images/committees'), $fileName);
            $committee->photo = $fileName;
        }
        $committee->save();
        Session::flash('success_administration_post','Successfully Saved');
        return redirect(Route('admin.dashboard'));
    }

    public function showAddnewsForm(){
        return view('admin.addNewsForm');
    }

    public function storeAddnewsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
        ));

        $news = new News();
        $news->headline = $request->headline;
        $news->body = $request->body;
        $news->save();

        $news = News::orderBy('id','DESC')->first();
        if($request->hasFile('photos')){
            $counter =1;
            foreach($request->photos as $item){
                $fileName = time().$counter.$item->getClientOriginalName();
                $item->move(public_path('/uploads/news'),$fileName);
                $counter++;
                $image =  new News_image();
                $image->path = $fileName;
                $news->broadcasts_image()->save($image);
            }
        }

        Session::flash('success_news_post','Successfully Saved');
        return redirect(Route('admin.dashboard'));
    }

    public function showEditNewsForm(Request $request){
        $news = News::with('broadcasts_image')->orderBy('id','DESC')->find($request->id);

        return view('admin.edits.EditNewsForm',['news' =>$news]);
    }

    public function EditNewsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
        ));

        $news = News::find($request->id);
        $news->headline = $request->headline;
        $news->body = $request->body;
        $news->save();

        $news = News::orderBy('id','DESC')->first();
        if($request->hasFile('photos')){
            $counter =1;
            foreach($request->photos as $item){
                $fileName = time().$counter.$item->getClientOriginalName();
                $item->move(public_path('/uploads/news'),$fileName);
                $counter++;
                $image =  new News_image();
                $image->path = $fileName;
                $news->broadcasts_image()->save($image);
            }
        }

        Session::flash('success_edit','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteNews(Request $request){
        $news = News::find($request->id);
        $news->delete();
        Session::flash('success_delete','Successfully Deleted');
        return redirect()->back();

    }

    public function showEditNoticeForm(Request $request){
        $notice = Notices::find($request->id);
        return view('admin.edits.EditNoticeForm',['notice' =>$notice]);
    }

    public function EditNoticeForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
            'body' => 'required',
        ));

        $notice = Notices::find($request->id);
        $notice->headline = trim($request->headline);
        $notice->body = trim($request->body);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $file->move(public_path('/uploads/notice'), $fileName);
            $notice->photo = $fileName;
        }
        $notice->save();
        Session::flash('success_edit','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteNotice(Request $request){
        $notice = Notices::find($request->id);
        $notice->delete();
        Session::flash('success_delete','Successfully Deleted');
        return redirect()->back();

    }

    public function showEditCommitteeMemberForm(Request $request){
        $member =Committee ::find($request->id);
        $committee = Committee_type::all();
        return view('admin.edits.editCommitteeForm',['committees' =>$committee,'member' => $member]);
    }

    public function EditCommitteeMemberForm(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:255',
            'designation' => 'required',
            'status' => 'required',
            'pic' => 'mimes:jpeg,bmp,png,jpg|max:10000'
        ));
        $committee =Committee::find($request->id);
        $committee->name =htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->name)));
        $committee->status = $request->status;
        $committee->designation = htmlspecialchars(preg_replace("/\s+/", " ", ucwords($request->designation)));
        $committee->fb = trim($request->fb);
        $committee->g_plus = trim($request->g_plus);
        $committee->twitter = trim($request->twitter);

        if($request->hasFile('pic')){
            $file = $request->file('pic');
            $fileName = time().$request->file('pic')->getClientOriginalName();
            $file->move(public_path('/uploads/images'), $fileName);
            $committee->photo = $fileName;
        }
        $committee->save();
        Session::flash('success_edit','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteCommitteeMember(Request $request){
        $adm = Administration ::find($request->id);
        $adm->delete();
        Session::flash('success_delete','Successfully Deleted');
        return redirect()->back();

    }

    public function showEditEventsForm(Request $request){
        $event = Events::with('events_image')->find($request->id);
        return view('admin.edits.editEventsForm',['event' =>$event]);
    }

    public function EditEventsForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
            'date' => 'required'
        ));

        $events = Events::find($request->id);
        $events->headline = $request->headline;
        $events->body = $request->body;
        $events->date = $request->date;
        $events->save();

        $events = Events::orderBy('id','DESC')->first();
        if($request->hasFile('photos')){
            $counter =1;
            foreach($request->photos as $item){
                $fileName = time().$counter.$item->getClientOriginalName();
                $item->move(public_path('/uploads/events'),$fileName);
                $counter++;
                $image =  new Events_image();
                $image->path = $fileName;
                $events->events_image()->save($image);
            }
        }

        Session::flash('success_edit','Successfully Edited');
        return redirect(Route('admin.dashboard'));
    }

    public function deleteEvents(Request $request){
        $event = Events::find($request->id);
        $event->delete();
        Session::flash('success_delete','Successfully Deleted');
        return redirect()->back();

    }

    public function showAddeventsForm(){
        return view('admin.addEventsForm');
    }

    public function storeEvents(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:500',
            'body' => 'required',
            'date' => 'required'
        ));

        $events = new Events();
        $events->headline = $request->headline;
        $events->body = $request->body;
        $events->date = $request->date;
        $events->save();

        $events = Events::orderBy('id','DESC')->first();
        if($request->hasFile('photos')){
            $counter =1;
            foreach($request->photos as $item){
                $fileName = time().$counter.$item->getClientOriginalName();
                $item->move(public_path('/uploads/events'),$fileName);
                $counter++;
                $image =  new Events_image();
                $image->path = $fileName;
                $events->events_image()->save($image);
            }
        }

        Session::flash('success_post','Successfully Saved');
        return redirect(Route('admin.dashboard'));
    }

    public function showAddNoticeForm(){
        return view('admin.addNoticeForm');
    }

    public function storeAddNoticeForm(Request $request){
        $this->validate($request,array(
            'headline' => 'required|max:255',
            'body' => 'required',
        ));

        $notice = new Notices();
        $notice->headline = trim($request->headline);
        $notice->body = trim($request->body);
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $file->move(public_path('/uploads/notice'), $fileName);
            $notice->photo = $fileName;
        }
        $notice->save();
        Session::flash('success_post','Successfully Saved');
        return redirect(route('admin.dashboard'));
    }

}
