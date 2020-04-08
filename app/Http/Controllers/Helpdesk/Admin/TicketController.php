<?php

namespace App\Http\Controllers\Helpdesk\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Helpdesk\Category;
use App\Model\Helpdesk\Status;
use App\Model\Helpdesk\Ticket;
use App\Model\Helpdesk\Activity;

use Illuminate\Support\Facades\Auth;
use App\Model\User\User;

class TicketController extends Controller
{
    public function getList()
    {
        $tickets = Ticket::all();
        return view('v1.admin.helpdesk.ticket.list', compact('tickets'));
    }

    public function getAddSolution($id)
    {
        $categories = Category::all();
        $statuses = Status::all();
        $ticket = Ticket::find($id);
        $admin_users = User::where('role', '>=', 2)->get();

        $activities = Activity::where('ticket_id', $id)->get();
        return view('v1.admin.helpdesk.ticket.edit', compact('categories', 'ticket', 'statuses', 'admin_users', 'activities'));
    }

    public function postAddSolution($id, Request $req)
    {
        $this->validate($req,[
            'solution' => 'required',
        ],
        [
            'solution.required'=>'Please input solution',
        ]);

        $acti = new Activity;
        $acti->ticket_id = $id;
        $acti->solution = $req->solution;
        $acti->user_id = Auth::id();
        $acti->status_id = $req->status_id;
        $acti->save();

        $ticket = Ticket::find($id);
        $ticket->assign_id = $req->assign_id;
        $ticket->save();

        return redirect()->back()->with('notify','Add successfully');
    }

    public function getDelActivity($activity_id)
    {
        $activity = Activity::find($activity_id);
        $activity->delete();
        return redirect()->back()->with('notify','Delete successfully');
    }

}
