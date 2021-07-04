
<html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>電卓テスト</title>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
 </head>


<body>

<div id="app">
<button @click="onclick">増加</button>
@{{ count }}
</div>

<script>
var app = new Vue({
    el: '#app',
  data: {
    count:0,
  },
  methods:{
  onclick: function(){
  return this.count ++;
}
}
});
</script>

<h2>グリム童話</h2><p />
<button id='aa' onclick="doAction(this.id)">
赤ずきん
</button>
<button id='bb' onclick="doAction(this.id)">
いばらひめ
</button>
<button id='cc' onclick="doAction(this.id)">
ラプンツェル
</button>
<button id='dd' onclick="doAction(this.id)">
七わのからす
</button>

<div id="app1">
<blockquote>
@{{ title }}
</blockquote>
<p />
@{{ text }}
</div>

<script>var data_aa = {title: 'こんにちは。',
        text: 'テスト'}
new Vue (
{
    el: '#app1',
    data: data_aa 
})

// ---------------------------------------------------------------
function doAction(id){
switch(id)
    {
    case 'aa':
        title = '赤ずきん'
        text = '　むかし、あるところに、ちいさな、かわいい女の子がいました。だれでも、ひと目見ただけで、この子がすきになりましたが、なんといっても一ばんかわいがったのは、この子のおばあさんでした。'
        break

    case 'bb':
        title = 'いばらひめ'
        text = '　昔むかし、王さまとおきさきががおりました。ふたりは毎日、「子どもがほしい！子どもがいればな！」と、言い暮らしていましたが、いつまでたっても、ひとりもさずかりませんでした。'
        break

    case 'cc':
        title = 'ラブンツェル'
        text = '　むかし、あるところに、亭主とおかみさんがおりました。長いあいだ、子どもがほしいと願っていましたが、さずかりませんでした。'
        break

    case 'dd':
        title = '七のからす'
        text = '　むかし、ある男のひとに、むすこばかり、七人ありました。むすめをほしい、ほしいとねがってきたのですが、ひとりも、さずからなかったのです。'
        break

    }

    data_aa.title = title
    data_aa.text = text
}</script>

 <div id="app12">
   <p> @{{total}}</p>
    <button-counter @increment="incrementCount" :retentions="retentions"></button-counter>
  </div>

<script>
 const buttonCounter = Vue.extend({
    props: {
      retentions: {
        type: Array,
      },
    },
    template: '<div><button @click="countUp(index)" v-for="(message, index) in messages" :key="message.id">@{{ message }}: @{{ retentions[index] }}</button></div>',
    data: function () {
      return {
        messages: ['Counter A', 'Counter B', 'Counter C'],
      };
    },
    methods: {
      countUp: function (index) {
        this.$emit('increment', index);
      },
    },
  });

  const vm = new Vue({
    el: '#app12',
    components: {
      'button-counter': buttonCounter,
    },
    data: {
      total: 0,
      retentions: [],
    },
    methods: {
      incrementCount: function (index) {
        this.total++;
        const buttonSum = this.retentions[index] + 1;
        this.retentions.splice(index, 1, buttonSum);
      },
    },
    watch: {
      total: {
        handler: function () {
          localStorage.setItem('total', this.total);
        },
        deep: true,
      },
      retentions: {
        handler: function () {
          localStorage.setItem('retentions', JSON.stringify(this.retentions));
        },
        deep: true,
      },
    },
    mounted: function () {
      this.total = JSON.parse(localStorage.getItem('total')) || 0;
      this.retentions = JSON.parse(localStorage.getItem('retentions')) || [0, 0, 0];
    },
  });
</script>


<table id="appd">
<form action="dentakutestresult" method="POST">
 @csrf
      <div>果物名：<input type="text" name="fruits_name"></div>
      <div>果物数：<input type="text" name="fruits_count"></div>
      <div>単価&nbsp;&nbsp;&nbsp;：<input type="text" name="fruits_value"></div>
      <input type="submit" name="計算">
</table>
  </form>          
<table id="appden">
<tr>
                   <td colspan="3"> <input type="text" v-model="output"></td>
                <td><button value="C" v-on:click="calc('C')">C</button></td>
            </tr>
            <tr>
                <td><button onClick="calc('7')">7</button></td>
                <td><button onClick="calc('8')">8</button></td>
                <td><button onClick="calc('9')">9</button></td>
                <td><button onClick="calc('/')">/</button></td>
            </tr>
            <tr>
                <td><button onClick="calc('4')">4</button></td>
                <td><button onClick="calc('5')">5</button></td>
                <td><button onClick="calc('6')">6</button></td>
                <td><button onClick="calc('*')">*</button></td>
            </tr>
            <tr>
                <td><button onClick="calc('1')">1</button></td>
                <td><button onClick="calc('2')">2</button></td>
                <td><button onClick="calc('3')">3</button></td>
                <td><button onClick="calc('-')">-</button></td>
            </tr>
            <tr>
                <td><button onClick="calc('0')">0</button></td>
                <td><button onClick="calc('.')">.</button></td>
                <td><button onClick="calc('+')">+</button></td>
                <td><button onClick="calc('=')">=</button></td>
            </tr>
        </table>

<script>

components: {
      'button-counter': countComponent,
    },
    methods: {
        calc: function (cmd) {
            if(cmd === '='){
                this.output = eval(this.output)
            }else if(cmd === 'C'){
                this.output = '0'
            }else if(this.output === '0') {
                this.output = cmd
            }else{
                this.output += cmd
            }
        }
    }
})
</script>


//<div id="app">
// <dentakutest-component></dentakutest-component>
// </div>



<router-view></router-view>
</body>


</html>

