<link rel="stylesheet" href="<?= base_url('../../plugins/sweetalert2/sweetalert2.min.css') ?>">
<script src="<?= base_url('../../plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('../../plugins/sweetalert2/sweetalert2.all.min.js') ?>"></script>

<?php if(session()->has('success')): ?>
<script>
    Swal.fire({
        title: 'Success',
        text: '<?= session('success') ?>',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    })
</script>
<?php elseif(session()->has('error')): ?>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'error',
        title: '<?= session('error') ?>'
    })
</script>
<?php endif; ?>
