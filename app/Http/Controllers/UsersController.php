private $deleteService;
 
    /**
    * コンストラクタ
    *
    * @param App\Services\Users\DeleteService $delete_service
    *
    */
    public function __construct(DeleteService $delete_service)
    {
        $this->deleteService = $delete_service;
    }
 
    /**
    * ユーザ削除
    *
    * @param App\User $user_id ユーザID
    *
    * @return \Illuminate\Http\Response
    */
    public function destroy($user_id)
    {
        // ユーザ削除処理実行
        $user_delete = $this->deleteService>deleteUser($user_id);
 
        if (!$user_delete)
        {
            // HTTPステータス:500 エラー
            return response()->json($this->deleteService>getDeleteMessage(),
                \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR);
        }
 
        // HTTPステータス:200 成功
        return response()->json($this->deleteService>getDeleteMessage(), 
            \Illuminate\Http\Response::HTTP_OK);
    }
 
...
 