<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;


class PagesController extends Controller{

	public function getIndex(){
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->with('posts',$posts);
	}


	public function getAbout(){

		$first = "Saiduzzaman";
		$last = "Tuhin";

		$full = $first." ".$last;

		$email = "tuhinsshadow@gmail.com";
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $full;
		return view('pages.about')->with("data",$data);
	}

	public function getContact(){
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('tuhinsshadow@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}
}

?>