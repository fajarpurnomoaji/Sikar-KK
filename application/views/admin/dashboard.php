 <!-- Small Box (Stat card) -->
 <div class="row">
     <div class="col-lg-3 col-6">
         <!-- small card -->
         <div class="small-box bg-info">
             <div class="inner">
                 <h3><?php echo $count ?></h3>

                 <p>Users</p>
             </div>
             <div class="icon">
                 <i class="fas fa-users"></i>
             </div>
             <a href="admin/duser" class="small-box-footer">
                 More info <i class="fas fa-arrow-circle-right"></i>
             </a>
         </div>
     </div>
     <div class="col-lg-3 col-6">
         <!-- small card -->
         <div class="small-box bg-warning">
             <div class="inner">
                 <h3><?php echo $count_kerusakan ?></h3>

                 <p>Data Kerusakan</p>
             </div>
             <div class="icon">
                 <i class="fas fa-book-medical"></i>
             </div>
             <a href="admin/dkerusakan" class="small-box-footer">
                 More info <i class="fas fa-arrow-circle-right"></i>
             </a>
         </div>
     </div>
     <div class="col-lg-3 col-6">
         <!-- small card -->
         <div class="small-box bg-danger">
             <div class="inner">
                 <h3><?php echo $count_gejala ?></h3>

                 <p>Data Gejala</p>
             </div>
             <div class="icon">
                 <i class="fas fa-book"></i>
             </div>
             <a href="admin/dgejala" class="small-box-footer">
                 More info <i class="fas fa-arrow-circle-right"></i>
             </a>
         </div>
     </div>
     <div class="col-lg-3 col-6">
         <!-- small card -->
         <div class="small-box bg-success">
             <div class="inner">
                 <h3><?php echo $count_bkasus ?></h3>

                 <p>Basis Kasus</p>
             </div>
             <div class="icon">
                 <i class="fas fa-atlas"></i>
             </div>
             <a href="admin/bkasus" class="small-box-footer">
                 More info <i class="fas fa-arrow-circle-right"></i>
             </a>
         </div>
     </div>
     <?= 'Selamat datang ' . $user_data['nama'] ?>
 </div>