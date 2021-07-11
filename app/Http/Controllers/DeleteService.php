private $delete_message = null;
 
    /**
    * エラーメッセージ取得
    *
    * @return string $this->delete_message
    */
    public function getDeleteMessage()
    {
        return $this->delete_message;
    }
 
    /**
    * ユーザ削除処理
    *
    * @param array $user_id ユーザID
    *
    * @return \Illuminate\Http\Response
    */
    public function deleteUser($user_id)
    {
        DB::beginTransaction();
        try
        {
            // 削除対象のユーザを行ロック
            $user = User::lockForUpdate()->withTrashed()->find($user_id);
 
            // 削除対象ユーザが存在しない又は削除済みの場合エラー
            if ($user === null || !empty($user>deleted_at))
            {
                throw new NotFoundException();
            }
            
            // 削除処理実行
            $user>delete();
 
            DB::commit();
 
            $this->delete_message = 'ユーザの削除に成功しました。';
 
            return true;
        }
        catch (NotFoundException $e)
        {
            DB::rollBack();
            \Log::error($e->getMessage());
 
            $this->delete_message = 'ユーザが存在しないかすでに削除されています。';
 
            return false;
        }
        catch (Exception $e)
        {
            DB::rollBack();
            \Log::error($e->getMessage());
 
            $this->delete_message = '予期せぬエラーが発生しました。';
 
            return false;
        }
    }
 
...
 
}