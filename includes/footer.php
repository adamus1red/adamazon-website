                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <footer class="footer footer-grad">
            <p class="footer-content">
                <span class="pull-right">&copy; <a href="<?php echo $config['base_url'];?>/about"><abbr title="The Useless Fucks">TUF</abbr> Corp.</a><!-- sans Darren, 'cos he can't code for shit--></span></p>
            </p>
        </footer>
	<script type="text/javascript" src="<?php echo $config['base_url'];?>/js/dropdown.js"></script>
        <?php include_once("analyticstracking.php") ?>
    </body>
</html>
<!--
<?php
$myfile = fopen("includes/random.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("includes/random.txt"));
fclose($myfile);
?>
-->
