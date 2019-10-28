var updateExpiredCertificationsApp = new Vue({
  el: '#updateExpiredCertificationsApp',
  data: {
    expiredCertification: {}
  },
  methods: {
    handleUpdate() {
      fetch('api/expiredCertifications/update.php',
      {
        method:'POST',
        body: JSON.stringify(this.expiredCertification), //convert this into a string of bytes so you can send it across the network.
        headers: {
          "Content-Type": "application/json; charset=utf-8" //UTF-8 is a character encoding standard for representing letters and numbers
        }
      })
      // this.handleReset();
      // location.reload(true);
    }
    // handleReset() {
    //   this.expiredCertification = {
    //   memberID: '',
    //   firstName: '',
    //   lastName: '',
    //   gender: '',
    //   dob: '',
    //   address:'',
    //   email:'',
    //   startDate: '',
    //   radioNumber:'',
    //   stationNumber:''
    //   }
    // }
  },
  created() {
  // this.handleReset();
}
});
