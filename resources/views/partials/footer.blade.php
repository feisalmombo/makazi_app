
    <footer class="col-sm-12">
        <div class="footer-copyright text-center" style="padding-top: 15px;">
             <strong style>Copyright &copy; {{ date('Y') }} <a href="http://feisalmombo.herokuapp.com/"  target="_blank" style="text-decoration: none; color:black;">EFE TECH</a> .</strong> All rights reserved.
         </div>
     </footer>


 </div>

 <!-- /#wrapper -->

 <!-- jQuery -->
<script src="{{ asset('temp/vendor/jquery/jquery.min.js') }}"></script> 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--> <!-- https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js     https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js -->
<script src="{{ asset('temp/js/permission_ajax.js') }}"></script>
<script src="{{ asset('temp/js/searchByAtm_ajax.js') }}"></script>
<script src="{{ asset('temp/js/finance_ajax.js') }}"></script>
<script src="{{ asset('temp/js/form_wizard.js') }}"></script>
<script src="{{ asset('temp/js/dropdownrdw.js') }}"></script>
<script src="{{ asset('register/js/dropdown.js') }}"></script>
 <!-- Bootstrap Core JavaScript -->
  <script src="{{ asset('temp/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
 <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

 <!-- Metis Menu Plugin JavaScript -->
 <script src="{{ asset('temp/vendor/metisMenu/metisMenu.min.js') }}"></script>

 <!-- Custom Theme JavaScript -->
 <script src="{{ asset('temp/dist/js/sb-admin-2.js') }}"></script>

 <!-- DataTables JavaScript -->
<script src="{{ asset('temp/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('temp/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>

 <script src="{{ asset('temp/vendor/datatables-responsive/dataTables.responsive.js') }}"></script> 



 
 <script language="JavaScript" type="text/javascript">   
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>


</body>
</html>
