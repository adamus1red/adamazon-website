<?php
    include_once("includes/config.php");
    $site_page_title = "About Us";
    include("includes/header.php");
    include("includes/heading.php");
    
?>
            <div style="margin: 40px;">
            <h1 class="fancy-text">Who we are</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies elit in tortor semper, eget cursus justo dictum. Phasellus feugiat eros eget risus ullamcorper tempor. Nullam vitae risus eu est ultricies sodales sed id felis. Nunc ultrices elit id quam fringilla placerat. Nunc urna arcu, mattis vitae tortor eu, lobortis suscipit ante. Nulla mollis pulvinar finibus. Morbi sed justo ut diam consectetur ornare id ac enim. Vivamus ultricies vehicula justo vel gravida. Curabitur molestie odio hendrerit lectus accumsan ultrices. Morbi sagittis augue vitae imperdiet aliquam. Etiam aliquam dolor ligula, vel elementum sapien auctor ac. Sed at turpis vitae sem sodales rutrum sit amet ac quam. Suspendisse imperdiet ex enim, nec hendrerit tellus dictum et. Pellentesque mollis purus sit amet magna vehicula, at tincidunt magna ullamcorper. Integer quis consectetur justo, quis egestas turpis.</p>
            <hr>
            <h1 class="fancy-text">The Team</h1>
            <table style="width: 100%;">
                <tbody>
                    <tr style="padding: 10px;">
                        <td width="25%">
                            <h3><a  class="button button-default" href="mailto:rjb12180@uni.strath.ac.uk"><i>Adam McGhie</i></a></h3>
                        </td>
                        <td width="25%">
                            <h3><a class="button button-default" href="mailto:mlb12174@uni.strath.ac.uk"><i>Thomas Sinclair</i></a></h3>
                        </td>
                        <td width="25%">
                            <h3><a class="button button-default" href="mailto:wsb12157@uni.strath.ac.uk"><i>Grant Toghill</i></a></h3>
                        </td>
                        <td width="25%">
                            <h3><a class="button button-default" href="mailto:pjb12147@uni.strath.ac.uk"><i>Darren Tang</i></a></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <h1 class="fancy-text"><i>Contact Us</i></h1>
            <p><a href="mailto:<?php echo $config['contact_address'];?>" class="button button-main"><?php echo $config['contact_address'];?></a></p>
            <hr />
		<h1>Current Adamazon stock price is: <div id="stock" style="inline-block">Loading current stock price ...</div></h1>
           </div>
<script type="text/javascript">// <![CDATA[
    $(document).ready(function() {
    $.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
    setInterval(function() {
        $('#stock').load('getStockPrice.php');
        }, 3000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds.
    }
);
// ]]></script>
<?php
    include("includes/footer.php");
?>
