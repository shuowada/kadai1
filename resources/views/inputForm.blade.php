<html lang="ja">
<head>
<meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8" />
    <title>画面遷移テスト</title>
  </head>
  <body>
    <h1>入力フォームPOSTテスト</h1>
    <div>{{$msg}}</div>
    <form action="formPost" method="POST">
      @csrf
      <div>果物名：<input type="text" name="fruits_name"></div>
      <div>果物数：<input type="text" name="fruits_count"></div>
      <div>単価&nbsp;&nbsp;&nbsp;：<input type="text" name="fruits_value"></div>
      <input type="submit" name="計算">
    </form>


    <tr v-for="(task, index) in allTasks" v-bind:key="task.id">
  <td>
    <div v-if="!isEditing[index]">
      <span>@{{ task.body }}</span>
    </div>
    <form v-if="isEditing[index]" @submit.prevent="editTask(index, task)">
      <input type="text" :value="task.body" :ref="task.id"> //ここを変更
      <div>
        <button type="submit">保存</button>
        <button type="button" @click="isEditing[index] = false">キャンセル</button>
      </div>
    </form>
  <td>  
</tr>



  </body>
</html>

<script src=" {{ asset('js/app.js') }} "></script>
<script>
export default {
  methods: {
    async editTask(key, task) {
      task.body = this.$refs[task.id][0].value
      await this.$store.dispatch('task/edit', task)
      this.$set(this.isEditing, key, false)
    },
  }
}
</script>