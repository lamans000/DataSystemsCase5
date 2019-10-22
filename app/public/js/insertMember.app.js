var insertMemberApp = new Vue({
  el: '#insertMemberApp',
  data: {
    member: {}
  },
  methods: {
    handleSubmit() {
      fetch('api/records/post.php',
      {
        method:'POST',
        body: JSON.stringify(this.member), //convert this into a string of bytes so you can send it across the network.
        headers: {
          "Content-Type": "application/json; charset=utf-8" //UTF-8 is a character encoding standard for representing letters and numbers
        }
      })
    }
  }
});
