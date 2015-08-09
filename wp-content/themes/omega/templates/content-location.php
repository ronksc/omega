<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<div class="contentBannerContainer">
				<? $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?=$feat_image?>" alt="" class="img-responsive" />
			</div>
			<div class="contentContainer">
				<h1>LOCATIONS</h1>
				<p class="highlight">Headquartered in Hong Kong with a network of teams stationed across your supply chain, Omega is ideally placed to support your business.</p>
				<div class="mapContainer">
					<div class="locationPoint" id="map">
						<div class="pointContainer" style="z-index:9000">
							<span class="ptHongKong">Hong Kong</span>
							<span class="ptBangladesh">Bangladesh</span>
							<span class="ptShanghai">Shanghai</span>
							<span class="ptQingdao">Qingdao</span>
							<span class="ptShenzhen">Shenzhen</span>
							<span class="ptDongguan">Dongguan</span>
							<span class="ptFuzhou">Fuzhou</span>
							<span class="ptIndia">India</span>
							<span class="ptIndonesia">Indonesia</span>
							<span class="ptPhilippines">Philippines</span>
							<span class="ptSriLanka">Sri Lanka</span>
							<span class="ptTaiwan">Taiwan</span>
							<span class="ptThailand">Thailand</span>
							<span class="ptTurkey">Turkey</span>
							<span class="ptVietnam">Vietnam</span>
						</div>
						<div class="overlayContainer" style="z-index:1;">
							<div class="ptHongKongLocationItem overlayItem">
								<div>
									807B The Harbourfront II<br />
									18-22 Tak Fung Street<br />
									Hung Hom<br />
									Hong Kong
								</div>
							</div>
							<div class="ptBangladeshLocationItem overlayItem">
								<div>
									Building 13A<br />
									Road 136, Gulshan-1<br />
									Dhaka<br />
									Bangladesh
								</div>
							</div>
							<div class="ptShanghaiLocationItem overlayItem">
								<div>
									United Power International Plaza<br />
									1158 Jiang Ning Road<br />
									Shanghai<br />
									China
								</div>
							</div>
							<div class="ptQingdaoLocationItem overlayItem">
								<div>
									Zhongshang Building<br />
									100 Hong Kong Middle Road<br />
									Qingdao<br />
									China
								</div>
							</div>
							<div class="ptShenzhenLocationItem overlayItem">
								<div>
									Peninsula Building<br />
									7 Xin Yuan Road<br />
									Shenzhen<br />
									China
								</div>
							</div>
							<div class="ptDongguanLocationItem overlayItem">
								<div>
									Prosperity Plaza Office Tower<br />
									138 Dongzong Road<br />
									Dongguan<br />
									China
								</div>
							</div>
							<div class="ptFuzhouLocationItem overlayItem">
								<div>
									Landmark Plaza<br />
									89 Wusi Road<br />
									Fuzhou<br />
									China
								</div>
							</div>
							<div class="ptIndiaLocationItem overlayItem">
								<div>
									Spazedge Commercial Tower B<br />
									47 Sohna Road<br />
									Gurgaon<br />
									India
								</div>
							</div>
							<div class="ptIndonesiaLocationItem overlayItem">
								<div>
									Menara DEA I<br />
									Kawasan Mega Kuningan<br />
									Jakarta<br />
									Indonesia
								</div>
							</div>
							<div class="ptPhilippinesLocationItem overlayItem">
								<div>
									Petron Megaplaza<br />
									358 Senator Gil Puyat Avenue<br />
									Manila<br />
									Philippines
								</div>
							</div>
							<div class="ptSriLankaLocationItem overlayItem">
								<div>
									2/1 Dutugemunu Street<br />
									Pamankada, Dehiwala<br />
									Sri Lanka
								</div>
							</div>
							<div class="ptTaiwanLocationItem overlayItem">
								<div>
									CTCI Building<br />
									77 Dunhua South Road<br />
									Taipei<br />
									Taiwan
								</div>
							</div>
							<div class="ptThailandLocationItem overlayItem">
								<div>
									BUI Building<br />
									Surawongse Road<br />
									Bangkok<br />
									Thailand
								</div>
							</div>
							<div class="ptTurkeyLocationItem overlayItem">
								<div>
									Yasemen Sokak<br />
									34464 Yenikoy  <br />
									Istanbul<br />
									Turkey
								</div>
							</div>
							<div class="ptVietnamLocationItem overlayItem">
								<div>
									E.town 2 Building<br />
									364 Cong Hoa Street<br />
									Ho Chi Minh<br />
									Vietnam
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>