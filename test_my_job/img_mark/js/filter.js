$(window).ready(function(){
	$('#all').click(function(){
        $('.pseudolink a').removeClass('current');
		$('.left').hide('');
        $('.left:not(.all)').show('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').show('');
		$(this).addClass('current');
		return false;
    });
						 
    $('#site').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.site)').hide('');
		$('.work-all').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-sites').show('');
		$(this).addClass('current');
		return false;
    });
	
	$('#graph').click(function(){	
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.graph)').hide('');
		$('.work-sites').hide('');
		$('.work-all').hide('');
		$('.work-multimedia').hide('');
        $('.work-graph').show('');
		var eLinks = document.getElementById('menu');
		$(this).addClass('current');
    	return false;
	});
	
	$('#multimedia').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.multimedia)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-all').hide('');
        $('.work-multimedia').show('');
		var eLinks = document.getElementById('menu');
		$(this).addClass('current');
		return false;
    });
	
	
	$('#2000').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').animate({opacity:'1'}, 400);
        $('.left:not(.2000)').animate({opacity:'0.2'}, 400);
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2001').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').animate({opacity:'1'}, 400);
        $('.left:not(.2001)').animate({opacity:'0.2'}, 400);
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2002').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').animate({opacity:'1'}, 400);
        $('.left:not(.2002)').animate({opacity:'0.2'}, 400);
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2003').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2003)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2004').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2004)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2005').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2005)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2006').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2006)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2007').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2007)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2008').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2008)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2009').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').show('');
        $('.left:not(.2009)').hide('');
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	$('#2010').click(function(){
		$('.pseudolink a').removeClass('current');
        $('.left').animate({opacity:'1'}, 400);
        $('.left:not(.2010)').animate({opacity:'0.2'}, 400);
		$('.work-sites').hide('');
		$('.work-graph').hide('');
		$('.work-multimedia').hide('');
        $('.work-all').hide('');
		$(this).addClass('current');
		return false;
    });
	
	
	
	
	
	$('#pic').click(function(){
		$('.pseudolink a').removeClass('current2');
		$('.left img').show('');	
		$('.left').height('300px');
		$('body').removeClass('body-color');
		$(this).addClass('current2');
		return false;
	});
	$('#spisok').click(function(){
		$('.pseudolink a').removeClass('current2');
		$('.left img').hide('');						
    	$('.left').height('50px');
		$('body').addClass('body-color');
		$(this).addClass('current2');
		return false;
	});
	$('#fix_up').click(function(){	
		$('.menu_upr_1').hide('');	
		$('.menu_upr_2').show('');	
		$('.menu_fixed').addClass('fix_up');
		return false;
	});
	$('#no-fix').click(function(){		
		$('.menu_upr_1').show('');	
		$('.menu_upr_2').hide('');	
		$('.menu_fixed').removeClass('fix_up');
		return false;
	});
	
	$('#pravo').click(function(){		
		$('.in_pravo').hide('');	
		$('.in_studio').show('');	
		return false;
	});
	$('#studio').click(function(){		
		$('.in_studio').hide('');	
		$('.in_pravo').show('');	
		return false;
	});
	
	$('#data').click(function(){
		$('.pseudolink a').removeClass('current3');
		$('.number').show('');	
		$('.number').height('1.2em');
		$(this).addClass('current3');
		return false;
	});
	$('#nodata').click(function(){
		$('.pseudolink a').removeClass('current3');
		$('.number').hide('');					
    	$('.number').height('1.2em');
		$(this).addClass('current3');
		return false;
	});
});