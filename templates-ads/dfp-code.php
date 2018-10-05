<script async src="https://www.googletagservices.com/tag/js/gpt.js"></script>

<script>
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
</script>

<script>
  // GPT slots
  var gptAdSlots = [];
  googletag.cmd.push(function() {

    // Define a size mapping object. The first parameter to addSize is
    // a viewport size, while the second is a list of allowed ad sizes.
    var mapping = googletag.sizeMapping().

     // Accepts both common mobile banner formats
	   addSize([320, 400], [320, 50]).

    // Desktop
    addSize([1024, 768], [[970, 90],[728, 90]]).
    //addSize([1050, 200], [[970, 90],[728, 90]]).

	   // Landscape tablet
	   addSize([750, 200], [728, 90]).build();

	  
	  	<?php if($_SERVER['REQUEST_URI'] == '/contests/home-depot-retool-school/'): ?>
	  
	   // Define the GPT slot
       gptAdSlots[0] =   googletag.defineSlot('/3395306/*aspireTV_3.0_top_banner', [[728, 90], [970, 90], [320, 50]], 'div-gpt-ad-1489669815296-0').defineSizeMapping(mapping).addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
      gptAdSlots[1] =  googletag.defineSlot('/3395306/*aspireTV_3.0_bottom_banner', [[728, 90],[970, 90], [320, 50]], 'div-gpt-ad-1489669961311-0').defineSizeMapping(mapping).addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
       gptAdSlots[2] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_300x600', [300, 600], 'div-gpt-ad-1489670238089-0').addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
       gptAdSlots[3] =  googletag.defineSlot('/3395306/*aspireTV_3.0_Homepage_300x250_BOTTOM', [300, 250], 'div-gpt-ad-1489670931820-0').addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
       gptAdSlots[4] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_TOP_300x250', [300, 250], 'div-gpt-ad-1489671363389-0').addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
       gptAdSlots[5] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_MIDDLE_300x250', [300, 250], 'div-gpt-ad-1489671553027-0').addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
       gptAdSlots[6] = googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_BOTTOM_300x250', [300, 250], 'div-gpt-ad-1489671633593-0').addService(googletag.pubads());googletag.pubads().setTargeting("homedepot", "RYS");googletag.pubads().enableSingleRequest();
	  
	    <?php elseif($_SERVER['REQUEST_URI'] == '/series/hbcu-sports/'): ?>
	  
	  	// Define the GPT slot
       gptAdSlots[0] =   googletag.defineSlot('/3395306/*aspireTV_3.0_top_banner', [[728, 90], [970, 90], [320, 50]], 'div-gpt-ad-1489669815296-0').defineSizeMapping(mapping).addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
      gptAdSlots[1] =  googletag.defineSlot('/3395306/*aspireTV_3.0_bottom_banner', [[728, 90],[970, 90], [320, 50]], 'div-gpt-ad-1489669961311-0').defineSizeMapping(mapping).addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
       gptAdSlots[2] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_300x600', [300, 600], 'div-gpt-ad-1489670238089-0').addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
       gptAdSlots[3] =  googletag.defineSlot('/3395306/*aspireTV_3.0_Homepage_300x250_BOTTOM', [300, 250], 'div-gpt-ad-1489670931820-0').addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
       gptAdSlots[4] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_TOP_300x250', [300, 250], 'div-gpt-ad-1489671363389-0').addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
       gptAdSlots[5] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_MIDDLE_300x250', [300, 250], 'div-gpt-ad-1489671553027-0').addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
       gptAdSlots[6] = googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_BOTTOM_300x250', [300, 250], 'div-gpt-ad-1489671633593-0').addService(googletag.pubads());googletag.pubads().setTargeting("usarmy", "hbcu");googletag.pubads().enableSingleRequest();
	  
	  	<?php else: ?>
	  
	  // Define the GPT slot
       gptAdSlots[0] =   googletag.defineSlot('/3395306/*aspireTV_3.0_top_banner', [[728, 90], [970, 90], [320, 50]], 'div-gpt-ad-1489669815296-0').defineSizeMapping(mapping).addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
      gptAdSlots[1] =  googletag.defineSlot('/3395306/*aspireTV_3.0_bottom_banner', [[728, 90],[970, 90], [320, 50]], 'div-gpt-ad-1489669961311-0').defineSizeMapping(mapping).addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
       gptAdSlots[2] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_300x600', [300, 600], 'div-gpt-ad-1489670238089-0').addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
       gptAdSlots[3] =  googletag.defineSlot('/3395306/*aspireTV_3.0_Homepage_300x250_BOTTOM', [300, 250], 'div-gpt-ad-1489670931820-0').addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
       gptAdSlots[4] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_TOP_300x250', [300, 250], 'div-gpt-ad-1489671363389-0').addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
       gptAdSlots[5] =  googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_MIDDLE_300x250', [300, 250], 'div-gpt-ad-1489671553027-0').addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
       gptAdSlots[6] = googletag.defineSlot('/3395306/*aspireTV_3.0_RightSidebar_BOTTOM_300x250', [300, 250], 'div-gpt-ad-1489671633593-0').addService(googletag.pubads());googletag.pubads().setTargeting("godaddy", "butterbrown");googletag.pubads().enableSingleRequest();
	  
	  	<?php endif; ?>


       //googletag.pubads().setTargeting('Category', ['home']);
       googletag.enableServices();

  });
</script>
