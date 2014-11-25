<?php
    include_once("includes/config.php");
    $site_page_title = "About Us";
    include("includes/header.php");
    include("includes/heading.php");
    
?>
            <div style="margin-left: 10px; margin-right: 10px;">
            <h1 style="font-family: 'Crimson Text', serif;"><i>Who we are</i></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies elit in tortor semper, eget cursus justo dictum. Phasellus feugiat eros eget risus ullamcorper tempor. Nullam vitae risus eu est ultricies sodales sed id felis. Nunc ultrices elit id quam fringilla placerat. Nunc urna arcu, mattis vitae tortor eu, lobortis suscipit ante. Nulla mollis pulvinar finibus. Morbi sed justo ut diam consectetur ornare id ac enim. Vivamus ultricies vehicula justo vel gravida. Curabitur molestie odio hendrerit lectus accumsan ultrices. Morbi sagittis augue vitae imperdiet aliquam. Etiam aliquam dolor ligula, vel elementum sapien auctor ac. Sed at turpis vitae sem sodales rutrum sit amet ac quam. Suspendisse imperdiet ex enim, nec hendrerit tellus dictum et. Pellentesque mollis purus sit amet magna vehicula, at tincidunt magna ullamcorper. Integer quis consectetur justo, quis egestas turpis.</p>
            <hr>
            <h1 style="font-family: 'Crimson Text', serif;"><i>The Team</i></h1>
            <table>
                <tbody>
                    <tr style="padding: 10px;">
                        <td width="25%">
                            <h1 style="font-family: 'Crimson Text', serif;"><i>Adam McGhie</i></h1>
                            <p>Wrote the back-end and base CSS</p>
                        </td>
                        <td width="25%">
                            <h1 style="font-family: 'Crimson Text', serif;"><i>Thomas Sinclair</i></h1>
                            <p>Wrote some...</p>
                        </td>
                        <td width="25%">
                            <h1 style="font-family: 'Crimson Text', serif;"><i>Grant Toghill</i></h1>
                            <p>Wrote some CSS</p>
                        </td>
                        <td width="25%">
                            <h1 style="font-family: 'Comic Sans MS', cursive, sans-serif;"><i>Darren Tang</i></h1>
                            <p style="font-family: 'Comic Sans MS', cursive, sans-serif;">Wrote some html</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <h1 style="font-family: 'Crimson Text', serif;"><i>Contact Us</i></h1>
            <p><a href="mailto:<?php echo $contact_address;?>" class="button button-main"><?php echo $contact_address;?></a></p>
            </div>
            
<?php
    include("includes/footer.php");
?>