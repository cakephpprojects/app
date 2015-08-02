<div class="users form">
    <b>Add User </b>&nbsp;
<form method="post" action="add">
User Name:<br>
<input type="text" name="data[User][username]" value="<?php echo $userAbout['User']['username'] ?>" data-bind="value:username">
<br>
Password:<br>
<input type="password" name="data[User][password]" value="<?php echo $userAbout['User']['password'] ?>" data-bind="value:password">
<br>
Email:<br>
<input type="email" name="data[User][email]" value="<?php echo $userAbout['User']['email'] ?>" data-bind="value:email" >
<br>
<br>
<input type="submit" data-bind="click: svchng"  value="Submit">
</form>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">

    var ViewModel = function() {
        var me = this;
        me.username = ko.observable("<?php echo $userAbout['User']['username'] ?>");
        me.password = ko.observable("<?php echo $userAbout['User']['password'] ?>");
        me.email = ko.observable("<?php echo $userAbout['User']['email'] ?>");
        me.getData=ko.observableArray([]);
        me.svchng = function() {
            var m = me;

            $.post("<?php echo $this->Html->url('/users/add'); ?>", {
                "data[User][username]": m.username,
                "data[User][password]": m.password,
                "data[User][email]": m.email,
            }, function(d) {
                var data = JSON.parse(d);

                if (data.success == "success") {
                    
                }
            });
        }, this;
       


    };
    $(document).ready(function() {
        ko.applyBindings(new ViewModel());
    });
</script>