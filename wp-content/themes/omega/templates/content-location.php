<div class="container">
	<div class="row">
		<div class="innerContentContainer">
			<div class="contentBannerContainer">
				<? $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?=$feat_image?>" alt="" class="img-responsive" />
                <div class="banner_text grey_bg">headquartered in asia with a network ideally spread to service your supply chain</div>
			</div>
			<div class="contentContainer">
				<h1>LOCATIONS</h1>
				<p class="highlight">Headquartered in Hong Kong with a network of teams stationed across your supply chain, Omega is ideally placed to support your business.</p>
				<div class="mapContainer">
					<img src="<?=get_stylesheet_directory_uri()?>/assets/img/location/bg_map.png" alt="" usemap="#Map" class="img-responsive"/>
					<map name="Map" id="Map">
						<area alt="Hong Kong" title="Hong Kong" href="javascript:;" shape="rect" coords="747,286,798,296" />
						<area alt="Bangladesh" title="Bangladesh" href="javascript:;" shape="rect" coords="685,271,718,281" />
						<area alt="Shanghai" title="Shanghai" href="javascript:;" shape="rect" coords="772,236,821,247" />
						<area alt="Qingdao" title="Qingdao" href="javascript:;" shape="rect" coords="769,215,809,225" />
						<area alt="Shenzhen" title="Shenzhen" href="javascript:;" shape="rect" coords="728,269,771,279" />
						<area alt="Dongguan" title="Dongguan" href="javascript:;" shape="rect" coords="731,252,782,262" />
						<area alt="Fuzhou" title="Fuzhou" href="javascript:;" shape="rect" coords="799,255,837,265" />
						<area alt="India" title="India" href="javascript:;" shape="rect" coords="656,257,686,266"/>
						<area alt="Indonesia" title="Indonesia" href="javascript:;" shape="rect" coords="702,332,748,342" />
						<area alt="Philippines" title="Philippines" href="javascript:;" shape="rect" coords="809,298,846,308" />
						<area alt="Sri Lanka" title="Sri Lanka" href="javascript:;" shape="rect" coords="648,318,700,329" />
						<area alt="Taiwan" title="Taiwan" href="javascript:;" shape="rect" coords="799,267,832,277" />
						<area alt="Thailand" title="Thailand" href="javascript:;" shape="rect" coords="702,299,753,309" />
						<area alt="Turkey" title="Turkey" href="javascript:;" shape="rect" coords="554,227,597,237" />
						<area alt="Vietnam" title="Vietnam" href="javascript:;" shape="rect" coords="747,319,805,330" />
					</map>
					<div class="overlayContainer" style="z-index:1;">
						<div class="ptHongKongLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Hong Kong</h2>
								807B The Harbourfront II<br />
								18-22 Tak Fung Street<br />
								Hung Hom<br />
								Hong Kong
							</div>
						</div>
						<div class="ptBangladeshLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Bangladesh</h2>
								Building 13A<br />
								Road 136, Gulshan-1<br />
								Dhaka<br />
								Bangladesh
							</div>
						</div>
						<div class="ptShanghaiLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Shanghai</h2>
								United Power International Plaza<br />
								1158 Jiang Ning Road<br />
								Shanghai<br />
								China
							</div>
						</div>
						<div class="ptQingdaoLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Qingdao</h2>
								Zhongshang Building<br />
								100 Hong Kong Middle Road<br />
								Qingdao<br />
								China
							</div>
						</div>
						<div class="ptShenzhenLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Shenzhen</h2>
								Peninsula Building<br />
								7 Xin Yuan Road<br />
								Shenzhen<br />
								China
							</div>
						</div>
						<div class="ptDongguanLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Dongguan</h2>
								Prosperity Plaza Office Tower<br />
								138 Dongzong Road<br />
								Dongguan<br />
								China
							</div>
						</div>
						<div class="ptFuzhouLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Fuzhou</h2>
								Landmark Plaza<br />
								89 Wusi Road<br />
								Fuzhou<br />
								China
							</div>
						</div>
						<div class="ptIndiaLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">India</h2>
								Spazedge Commercial Tower B<br />
								47 Sohna Road<br />
								Gurgaon<br />
								India
							</div>
						</div>
						<div class="ptIndonesiaLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Indonesia</h2>
								Menara DEA I<br />
								Kawasan Mega Kuningan<br />
								Jakarta<br />
								Indonesia
							</div>
						</div>
						<div class="ptPhilippinesLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Philippines</h2>
								Petron Megaplaza<br />
								358 Senator Gil Puyat Avenue<br />
								Manila<br />
								Philippines
							</div>
						</div>
						<div class="ptSriLankaLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Sri Lanka</h2>
								2/1 Dutugemunu Street<br />
								Pamankada, Dehiwala<br />
								Sri Lanka
							</div>
						</div>
						<div class="ptTaiwanLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Taiwan</h2>
								CTCI Building<br />
								77 Dunhua South Road<br />
								Taipei<br />
								Taiwan
							</div>
						</div>
						<div class="ptThailandLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Thailand</h2>
								BUI Building<br />
								Surawongse Road<br />
								Bangkok<br />
								Thailand
							</div>
						</div>
						<div class="ptTurkeyLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Turkey</h2>
								Yasemen Sokak<br />
								34464 Yenikoy  <br />
								Istanbul<br />
								Turkey
							</div>
						</div>
						<div class="ptVietnamLocationItem overlayItem">
							<div>
								<h2 class="hidden-sm hidden-md hidden-lg">Vietnam</h2>
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