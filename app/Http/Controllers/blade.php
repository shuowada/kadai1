public function chat()
    {   

        $messages = DB::table('chats')
            ->join('users', 'users.id', '=', 'chats.user_id')
            ->select('users.*', 'chats.*')
            ->orderBy('chats.created', 'ASC')
            ->get();


        return $messages;
    }