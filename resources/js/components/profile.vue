</template>
 
<script>
export default {
    data() { //データの初期値を設定
      return {
        userid: "",
        name: "",
        profile: "",
        sex: "",
        birth: "",
        pref: "",
 
      };
    },
    methods: {
      getProfiles() {
        const data = {
          userid: 'bonchan' //今回投げるuserid
        }
        var self = this;
        axios.post('https://Larabel側URL/profile', data)
          .then(res =>  {
            self.userid = res.data.userid;
            self.name = res.data.name;
            self.profile = res.data.profile;
            self.sex = res.data.sex;
            self.birth = res.data.birth;
            self.pref = res.data.pref;
        }).catch( error => { console.log(error); });
      }
    },
    created() { //APIアクセスでgetProfiles()を呼び出す
      this.getProfiles()
    }
   
  }
</script>