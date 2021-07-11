<html>
    <body>
        <div id="app">
            <table>@{{ dentaku }}</table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
        <script>

            new Vue({
                el: '#app',
data: {
        comedians: {}
    },
    mounted() {
        var self = this;
        var url = '/ajax/dentaku';
        axios.get(url).then(function(response){
            self.comedians = response.data;
        });
    }
            });

        </script>
    </body>
</html>