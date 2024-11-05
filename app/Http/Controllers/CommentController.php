<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function index(){
        $comments=Comment::latest()->get();
        return view('comments.index',compact('comments'));
    }
    public function store(Request $request, $blogId) {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        Comment::create([
            'blog_id' => $blogId,
            'name' => $request->name,
            'message' => $request->message,
            'parent_id' => $request->parent_id,
        ]);
    
        return back();
    }
    
public function deleteComment($commentId)
{
    Comment::findOrFail($commentId)->delete();
    return redirect()->back()->with('success', 'Comment deleted successfully');
}

public function respondToComment(Request $request, $commentId)
{
    $request->validate([
        'admin_response' => 'required|string|max:1000',
    ]);

    // Find the existing comment by ID
    $comment = Comment::findOrFail($commentId);

    // Update the admin_response field with the response from the request
    $comment->admin_response = $request->input('admin_response');
    $comment->save();

    return redirect()->back()->with('success', 'Response added successfully');
}

public function destroy($id) {
    Comment::findOrFail($id)->delete();
    return back();
}
public function edit($id)
{
    // Find the comment by ID
    $comment = Comment::findOrFail($id);

    // Pass the comment to the edit view
    return view('comments.edit', compact('comment'));
}


}
