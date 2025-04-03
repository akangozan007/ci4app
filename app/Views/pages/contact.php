
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <div class="container my-5">
      <div class="row">
        <div class="col">
        <h1>Contact Me</h1>
      <div class="container-fluid">
      <div class="card text-center">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <code class="card-text">"The more you quiet, the more you are able to hear." <br> – Kali Linux </code>
                <br>
                <img src="https://assets.everspringpartners.com/dims4/default/0a9b03e/2147483647/strip/true/crop/1600x504+0+0/resize/800x252!/format/webp/quality/90/?url=http%3A%2F%2Feverspring-brightspot.s3.us-east-1.amazonaws.com%2Fd0%2F83%2F04b3f6e14cfda096a4c98649d5e9%2F21-best-kali-linux-tools.jpg" class="img-thumbnail w-35 mx-auto" alt="">
                    <ul class="list-group list-group-flush text-start">
                    <?php  foreach ($alamat as $keterangan) : ?>
                        <li class="list-group-item h3"><?= $keterangan; ?></li>
                    <?php   endforeach; ?>                        
                    </ul>
                <br>
                <a href="https://wa.me/+6283844335251" class="btn btn-primary">WhatsApp</a>
            </div>
            <div class="card-footer text-body-secondary">
               Now
            </div>
            </div>
      </div>
        </div>
      </div>
    </div>
<?= $this->endSection(); ?>
  
