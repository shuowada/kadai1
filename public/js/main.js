const app = new Vue({
    el: '#app',
    data: {
        radio: '',
        text: '',
        isTextTyping: false,
        isRadioSelecting: false,

        uuid: ''
    },
    watch: {
        radio: _.debounce(function() {
            this.isRadioSelecting = false;
        }, 1000),

        text: _.debounce(function() {
            this.isTextTyping = false;
        }, 2000),

        isRadioSelecting: function(selecting) {
            if (selecting) {
                return;
            }
            this.saveData('radio', this.radio, 'ラジオボタン');
        },

        isTextTyping: function(typing) {
            if (typing) {
                return;
            }
            this.saveData('text', this.text, 'テキスト入力');
        },
    },
    methods: {
        initUUID: function() {
            if (Cookies.get('uuid') !== undefined) {
                this.uuid = Cookies.get('uuid');
                return;
            }

            var d = new Date().getTime();
            var d2 = (performance && performance.now && (performance.now() * 1000)) || 0;
            this.uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16;
                if (d > 0){
                    r = (d + r) % 16 | 0;
                    d = Math.floor(d / 16);
                } else {
                    r = (d2 + r) % 16 | 0;
                    d2 = Math.floor(d2 / 16);
                }
                return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
            });


            Cookies.set('uuid', this.uuid, { expires: 3650 });
        },

        saveData: function(key, value, description) {
            let postData = {
                'user_id': this.uuid,
                'key': key,
                'value': value
            };
            axios.post("/saveData", postData).then(response => {
                this.$notify.info({
                    title: '送信',
                    message: '内容保存済み：' + description
                });
            }).catch(error => {
                this.$notify.error({
                    title: '送信',
                    message: '送信に失敗しました'
                })
            });
        },

        loadData: function () {
            let postData = {
                'user_id': this.uuid
            };

            axios.post("/loadData", postData).then(response => {
                let data = response.data['result'];
                if (data == null) {
                    this.$notify.info({
                        title: '受信',
                        message: '新規ユーザー'
                    });
                    return;
                }

                this.radio = data['radio'];
                this.text = data['text'];
                this.$notify.info({
                    title: '受信',
                    message: '内容読み取り完了'
                });
            }).catch(error => {
                this.$notify.error({
                    title: '受信',
                    message: '受信に失敗しました'
                })
            });
        }
    }
});

app.initUUID();
app.loadData();