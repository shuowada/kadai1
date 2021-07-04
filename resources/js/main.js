new Vue({
    el: '#app-4',
    methods : {
        hoge : function(text, event){
            var domtext = event.target.textContent;
            alert('text : ' + text + ' domtext : ' + domtext);
        }    
    }
});