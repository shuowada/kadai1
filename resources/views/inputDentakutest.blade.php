
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>電卓テスト</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
 
</head>

<body>


<table id="appd">
<form action="dentakutestresult" method="POST">
 @csrf
      <div>果物名：<input type="text" name="fruits_name"></div>
      <div>果物数：<input type="text" name="fruits_count"></div>
      <div>単価&nbsp;&nbsp;&nbsp;：<input type="text" name="fruits_value"></div>
      <input type="submit" name="計算">
</table>
            </form>


//<form method="POST" action="dentakutestresult">
<button id="addButton"class="btn btn-success"v-on:click="output">追加</button>
<button value="resu" v-on:click="output">hozon</button>
<input id="send" type="submit" value="送信する">
//</form>
 
        <table id="appdentaku">

<td colspan="6"><input type="text" name="totyu" v-model="name"></td>
 <tr>
                <td colspan="3"><input type="text" name="result" v-model="output"></td>

                <td><button value="C" v-on:click="calc('C')">C</button></td>
            </tr>
            <tr v-for="row in itemss">
                <td v-for="item in row">
                    <button v-on:click="calc(item)">@{{ item }}</button>
                </td>
            </tr>
        </table>
//<form action="/hello" mthod="post">

//<form>
<script>
 var app = new Vue({ 
    el: '#appdentaku',
    data: { 
        name:"-",
        output: '0',
        itemss: [
            ['7', '8', '9', '/'],
            ['4', '5', '6', '*'],
            ['1', '2', '3', '-'],
            ['0', '.', '+', '=']
        ]
    },
    methods: {
        calc: function (cmd) {
            if(cmd === '='){
                this.output = eval(this.output)	
            }else if(cmd === 'C'){
                this.output = '0'
                this.name = '0'
            }else if(this.output === '0') {
                this.output = cmd
                this.name = cmd
            }else{
                this.output += cmd
                this.name +=cmd 
              }
        }
     
}
})


</script>








</body>

</html>

