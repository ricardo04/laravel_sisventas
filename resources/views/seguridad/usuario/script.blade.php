<script type="text/javascript">
    
    $(document).ready(function () {
        $('#tableusuario').DataTable({
        	"scrollX":true
        });
        
        $('.cedula').inputmask("999-999999-9999A");
        $('.telefono').inputmask("9999-9999");
    });
    
</script>
