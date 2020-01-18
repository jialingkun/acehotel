<script>
  function setCookieServer(cname, cvalue){
    return $.ajax(
      "<?php echo base_url() ?>index.php/create_cookie", {
        type: 'POST',
        data: {name: cname, value: cvalue}
      }
      );
  }

  function getCookieServer(cname) {
    return $.ajax(
      "<?php echo base_url() ?>index.php/get_cookie/" + cname, {
       dataType: 'text'
     }
     );
  }

  function getLoginCookieServer(cname) {
    return $.ajax(
      "<?php echo base_url() ?>index.php/get_cookie_decrypt/" + cname, {
       dataType: 'text'
     }
     );
  }
</script>