  const buttonCounter = Vue.extend({
    props: {
      retentions: {
        type: Array,
      },
    },
    template: '<div><button @click="countUp(index)" v-for="(message, index) in messages" :key="message.id">{{ message }}: {{ retentions[index] }}</button></div>',
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
  })

var app = new Vue({ 
    el: '#app',
    data: {
        output: '0',
        items: [
            ['7', '8', '9', '/'],
            ['4', '5', '6', '*'],
            ['1', '2', '3', '-'],
            ['0', '.', '+', '=']
        ]
    },
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
});

