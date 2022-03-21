Vue.createApp({
    data() {
      return {
        stepgioco: 0,
        image: null,
      }
    },
    methods: {
        uploadFile() {
            this.image = this.$refs.file.files[0];
        },
        submitFile(){
            const formData = new FormData();
            formData.append('file', this.image);
            const headers = {'Content-Type':'multipart/form-data'};
            axios.post('/raccoltapunti-vallefiorita/frontend/web/index.php?r=scontrino/create', formData, {headers}).then((res) => {
                res.data.files;
                res.status;
                stepgioco++;
            })
        }
     },
  }).mount('#gioco')