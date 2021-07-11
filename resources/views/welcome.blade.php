<!DOCTYPE html>
<html>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.15/lodash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.4.0/index.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    </head>
    <body>
        <div id="app">
            ラジオボタン<br/>
            <input type="radio" value="1" v-model="radio" @click="isRadioSelecting = true">選択肢1<br/>
            <input type="radio" value="2" v-model="radio" @click="isRadioSelecting = true">選択肢2<br/>
            <input type="radio" value="3" v-model="radio" @click="isRadioSelecting = true">選択肢3<br/>
            <br/>
            テキスト入力<br/>
            <input type="text" v-model="text" @input="isTextTyping = true" placeholder="内容を入力">
            <br/>
        </div>
    </body>
    <script src="{{ asset('/js/main.js') }}"></script>
</html>
