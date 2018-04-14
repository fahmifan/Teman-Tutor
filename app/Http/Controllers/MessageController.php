<?php namespace App\Http\Controllers;

	use DB;
  use App\Message;
  use App\User;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Hashing\BcryptHasher;
	use Illuminate\Support\Facades\Input;
  use App\Events\MessageSent;
	class MessageController extends Controller
		{
			// Limiting the Methods that could be
			// used without an 'api_token'
			function __construct()
				{
				}

      /**
       * Fetch all messages
       *
       * @return Message
       */
      public function fetchMessages()
      {
        return Message::with('user')->get();
        // return ['status' => 'Get messages'];
      }

      public function getGroupsMessages($id)
      {
        $group_messages = DB::table('message')->where('group_id', $id)->get();
        return response()->json($group_messages);
      }

      /**
       * Persist message to database
       *
       * @param  Request $request
       * @return Response
       */
      public function sendMessage(Request $request)
      {
        $message = Message::create($request->all());
        
        return response()->json($message);
      }
		}
 ?>