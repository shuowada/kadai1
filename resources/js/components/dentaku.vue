<template>
  <div>
    <!-- 追加用インプットとボタン -->
    <input type="text" v-model="todo_form">
    <button type="button" @click="addTodo">追加</button>
    <!-- データ表示・1つずつ削除、更新ボタンをつけて繰り返し -->
    <div v-for="todo in todos">
      <button type="button" @click="deleteTodo(todo.id)">削除</button>
      <button type="button" @click="updateTodo(todo.id)">更新</button>
      <input type="text" v-model="todo.todo">
    </div>
  </div>
</template>

<script>
  const send = (method,uri,data={}) => {
      // 後述のapi定数から値をオブジェクトで受け取る。
      const url = 'http://127.0.0.1:8000' + uri // uriは引数でapi
      return new Promise((resolve)=>{ 
      //Promiseは非同期処理の状態を監視するオブジェクト。
      //resolveは解決時、rejectは失敗時の通知をするための引数。
          var xhr = new XMLHttpRequest();
          // XMLHttpRequestオブジェクトで非同期通信を管理する。※変数に代入。
          xhr.open(method, url);
          //HTTPリクエストを初期化
          xhr.setRequestHeader("Content-Type", "application/json; charset=utf-8");
          // リクエスト時に送信するヘッダーを追加
          xhr.onload = () => {
          // 受信成功時に呼び出し
              try{
              // 例外が発生するかもしれないブロック。成功時jsonデータを送信。
                  const res_json = JSON.parse(xhr.responseText) 
                  // 応答本体をブレーンテキストとして取得。JSON.parseで値をJSに変換。
                  // responseはコントローラから返ってきた値。
                  resolve(res_json)
              }catch (e) {
              // 失敗した場合に実行されるブロック。finallyがあった際はどちらが実行されても最終的に実行される命令。
                  resolve(xhr.responseText)
              }
          }
          xhr.onerror = () => {
          // 通信がabort()メソッドによって中断された場合
              console.log(xhr.status);
              console.log("error!");
          };
          xhr.send(data);
          // HTTPリクエストを送信(引数は要求本体)
      })
  }
  const api = {
    // 全て前述のsend定数に値を送る。APIを増やしやすいような記載をしてる。
      getTodoList(){
          return send("GET", "/api/");
          // sendメソッドの引数にリクエストメソッド。これがapi.phpのRouteファサードに連動。
      },
      postTodo(todo){
          return send("POST", "/api/", todo);
      },
      updateTodo(id,todo){
          return send("PUT", "/api/"+id, todo);
      },
      deleteTodo(id,data){
          return send("DELETE", "/api/"+id, data);
      }
  }
  export default {
    data(){
      return {
        active_todo: null,
        todo_form:"",
        // 追加用インプットタグ
        todos:[]
        // ToDoリストを配列で受取
      }
    },
    methods:{
      addTodo(){
      // 追加ボタンクリックで実行。
        let data = {todo:this.todo_form}
        // 追加用インプットタグのデータを代入。
        data._token = document.getElementsByName('csrf-token')[0].content;
        // getElementsByNameはname属性で検索。リスト配列で対象の1つ目を取得。
        // content属性。おそらくapp.blade側のmetaタグtokenとリンク。
          api.postTodo(JSON.stringify(data)).then(()=>{
            // JSON.stringfyでJSのオブジェクトデータをJSON文字列に変換して値を引数に持つ。
              this.getTodoList()
          })
          // ネスト下オブジェクト
        },
        // ここまでで1つのメソッド。
      deleteTodo(id){
      // 削除ボタンクリックで実行
        let data = {}
        // APIで叩いたdataを取得。idを引数で取得。
        data._token = document.getElementsByName('csrf-token')[0].content;
        api.deleteTodo(id,JSON.stringify(data)).then(()=>{
            this.getTodoList()
        })
      },
      updateTodo(id){
        // 更新ボタンクリックで実行
        let data = {todo:this.todos.filter((v)=>{return v.id === id})[0].todo}
          data._token = document.getElementsByName('csrf-token')[0].content;
          api.updateTodo(id,JSON.stringify(data)).then(()=>{
            this.getTodoList()
        })
      },
      getTodoList(){
        api.getTodoList().then((result)=>{
          // thenはapi.getTodoListのPromiseの結果を受け取っている。
          this.todos = result
          // Promiseで非同期処理を終えた後の結果(引数result)をtodosに代入。
        })
      }
    },
    mounted() {
      // インスタンスの状態を使ってDOMが作成(HTMLをJSで編集できる状態)された直後に呼ばれる。
      // ★getTodoListメソッド(ToDoリストの取得)を実行する。
      this.getTodoList()
        console.log('Component mounted.')
    }
  }
</script>