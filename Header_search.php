<!--Header Down Area-->
	<div class="header-search" style="position: relative;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="search-form d-flex align-items-center justify-content-center">
						<div class="col-lg-6 col-md-7 col-sm-9 col-9 px-0 search-box">
							<input type="text" id="search_box" placeholder="Search Course And Discounts">
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-2 px-0 search-btn">
							<button type="button" class="search_btn"><i class="ti ti-search"></i></button>
							<button type="button" class="close_list"><i class="ti ti-close"></i></button>
						</div>
						<div class="course_list col-lg-8 mx-5 col-md-9 col-sm-11 col-11 justify-content-center" style="padding: 0px 10px;position: absolute;top: 50px;">
							<div class="col-xl-12 col-lg-12 col-md-12 px-0 col-sm-12 course_sub_list">
								<ul class="m-0 p-0 ul_tag">
									<?php
										include 'config.php';
										$query = mysqli_query($conn,"SELECT * FROM `coursedetail`");
										while ($row = mysqli_fetch_assoc($query)) {
											echo '<a href="course_detail.php?course_id='.$row['course_id'].'"><li>'.$row['course_title'].'</li></a>';	
										}
									?>
									<!-- <button class="btn btn-dark btn-sm mt-3" id="close_list"><span class="ti-close"></span></button> -->
								</ul>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>