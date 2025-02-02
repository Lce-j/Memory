<div id="timer">
    <p>05:00</p>
    <?php echo $min?> : <?php echo $sec ?>
    <!-- <script type="text/javascript">
        var decount = <?php echo $time;?>
        function displayTimer(){
            var mins = Math.floor((decount % 36e5) / 6e4),
                secs = Math.floor((decount % 6e4) / 1000);
                $('.count').html(mins+':'+secs);
        }
        setInterval(function(){
        millis -= 1000;
        displaytimer();
        }, 1000);

    </script> -->
</div>