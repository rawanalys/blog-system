<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class Post extends BaseController
{
    public function dashboard()
    {
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();
        $posts = $postModel->orderBy('created_at', 'AESC')->findAll();

        foreach ($posts as &$post) {
            $user = $userModel->find($post['user_id']);
            $post['author_name'] = $user ? $user['name'] : 'Unknown';
        }

        return view('dashboard', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts/create');
    }
   
    public function store()
    {
        $userId = session()->get('id');

        if (!$userId) {
            return redirect()->to('/auth')->with('error', 'Please log in to create a post.');
        }

        $postModel = new PostModel();

        $data = [
            'user_id'    => $userId,
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (!$postModel->insert($data)) {
            return redirect()->back()->with('error', 'Failed to create post.');
        }

        return redirect()->to('/dashboard')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $postModel = new \App\Models\PostModel();
        $data['post'] = $postModel->find($id);

        if (!$data['post']) {
            return redirect()->to('/dashboard')->with('error', 'Post not found.');
        }

        return view('posts/edit', $data);
    }

    public function update($id)
    {
        $postModel = new \App\Models\PostModel();
        $data = [
            'title'      => $this->request->getPost('title'),
            'content'    => $this->request->getPost('content'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $postModel->update($id, $data);
        
        return redirect()->to('/dashboard')->with('success', 'Post updated successfully!');
    }

    public function delete($id)
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/dashboard')->with('error', 'Invalid request.');
        }
        $postModel = new \App\Models\PostModel();
        $post = $postModel->find($id);

        if (!$post) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Post not found.']);
        }

        $postModel->delete($id);
        return $this->response->setJSON(['success' => true]);
    }

    public function view($id)
    {
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();

        $post = $postModel->find($id);

        if (!$post) {
            return redirect()->to('/dashboard')->with('error', 'Post not found.');
        }

        $author = $userModel->find($post['user_id']);

        return view('posts/view', [
            'post' => $post,
            'author' => $author
        ]);
    }

    public function homepage()
    {
        helper('text');
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();

        $posts = $postModel->orderBy('created_at', 'DESC')->findAll();

        foreach ($posts as &$post) {
            $user = $userModel->find($post['user_id']);
            $post['author_name'] = $user ? $user['name'] : 'Unknown';
        }

        return view('frontend/homepage', ['posts' => $posts]);
    }

    public function author($id)
    {
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();

        $author = $userModel->find($id);
        if (!$author) {
            return redirect()->to('/')->with('error', 'Author not found.');
        }

        $posts = $postModel->where('user_id', $id)->orderBy('created_at', 'DESC')->findAll();

        return view('frontend/author', [
            'author' => $author,
            'posts' => $posts
        ]);
    }
}    
