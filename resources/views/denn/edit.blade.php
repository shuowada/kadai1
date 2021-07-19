
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
        <tr><th>id</th><th>siki</th><th>goukei</th></tr>
        @foreach ($items as $item)
            <tr>
                 <td>{{$item->id}}</td>
                <td>{{$item->siki}}</td>
                <td>{{$item->goukei}}</td>
            </tr>

        @endforeach
    </table>

 <table id="appdentaku">
<form action="/denn/edit"　method="post">
{{ csrf_field()}}
<td colspan="6"><input type="hidden" name="id"  value="{{$form->id}}"></td>
<td colspan="6"><input type="text" name="totyu" v-model="name" value="{{$form->totyu}}"></td>
<td colspan="6"><input type="text" name="result" v-model="output" value="{{$form->result}}"></td>
<td colspan="6"><input type="submit"  value="send"></td>
</form>

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