<?php

namespace App\Http\Controllers\Helpdesk\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Helpdesk\Status;
use App\Model\Helpdesk\Ticket;
use App\Model\Helpdesk\Category;
use App\Model\Helpdesk\Activity;

use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function getList()
    {
    	$tickets = Ticket::where('user_id', Auth::id())->get();
    	return view('v1.member.helpdesk.ticket', compact('tickets'));
    }

    public function getAdd()
    {
        $categories = Category::all();
    	return view('v1.member.helpdesk.add', compact('categories'));
    }

    public function postAdd(Request $req)
	{
		$this->validate($req,[
            'content' => 'required',
            'title' => 'required',
        ],
        [
            'content.required'=>'Please input content',
            'title.required'=>'Please input title',
        ]);

		$ticket = new Ticket;
		$ticket->title = $req->title;
        $ticket->content = $req->content;
        $ticket->user_id = Auth::id();
		$ticket->priority = 90;
        $ticket->priority = 1;
        $ticket->category_id = $req->category_id;

		$ticket->save();
		return redirect()->back()->with('notify','Add successfully');
	}

    public function getDetail($id)
    {
        $categories = Category::all();
        $statuses = Status::all();
        $ticket = Ticket::find($id);

        $activities = Activity::where('ticket_id', $id)->get();
        return view('v1.member.helpdesk.detail', compact('categories', 'ticket', 'statuses', 'admin_users', 'activities'));
    }

     

}
