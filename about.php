<?php
    include_once("includes/config.php");
    $site_page_title = "About Us";
    include("includes/header.php");
    include("includes/heading.php");
    
?>
            <div style="margin: 40px;">
            <h1 style="font-family: 'Crimson Text', serif;"><i>Who we are</i></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies elit in tortor semper, eget cursus justo dictum. Phasellus feugiat eros eget risus ullamcorper tempor. Nullam vitae risus eu est ultricies sodales sed id felis. Nunc ultrices elit id quam fringilla placerat. Nunc urna arcu, mattis vitae tortor eu, lobortis suscipit ante. Nulla mollis pulvinar finibus. Morbi sed justo ut diam consectetur ornare id ac enim. Vivamus ultricies vehicula justo vel gravida. Curabitur molestie odio hendrerit lectus accumsan ultrices. Morbi sagittis augue vitae imperdiet aliquam. Etiam aliquam dolor ligula, vel elementum sapien auctor ac. Sed at turpis vitae sem sodales rutrum sit amet ac quam. Suspendisse imperdiet ex enim, nec hendrerit tellus dictum et. Pellentesque mollis purus sit amet magna vehicula, at tincidunt magna ullamcorper. Integer quis consectetur justo, quis egestas turpis.</p>
            <hr>
            <h1 style="font-family: 'Crimson Text', serif;"><i>The Team</i></h1>
            <table style="width: 100%;">
                <tbody>
                    <tr style="padding: 10px;">
                        <td width="25%">
                            <h3 style="font-family: 'Crimson Text', serif;"><a href="mailto:rjb12180@uni.strath.ac.uk"><i>Adam McGhie</i></a></h3>
                        </td>
                        <td width="25%">
                            <h3 style="font-family: 'Crimson Text', serif;"><a href="mailto:mlb12174@uni.strath.ac.uk"><i>Thomas Sinclair</i></a></h3>
                        </td>
                        <td width="25%">
                            <h3 style="font-family: 'Crimson Text', serif;"><a href="mailto:wsb12157@uni.strath.ac.uk"><i>Grant Toghill</i></a></h3>
                        </td>
                        <td width="25%">
                            <h3 style="font-family: 'Crimson Text', serif;"><a href="mailto:pjb12147@uni.strath.ac.uk"><i>Darren Tang</i></a></h3>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h1 style="font-family: 'Crimson Text', serif;"><i>Contact Us</i></h1>
            <p><a href="mailto:<?php echo $config['contact_address'];?>" class="button button-main"><?php echo $config['contact_address'];?></a></p>
            </div>
            
<?php
    include("includes/footer.php");
?>
