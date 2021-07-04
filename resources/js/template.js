var data_aa = {title: 'こんにちは。',
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
}

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
