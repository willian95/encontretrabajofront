$(".main-banner__content").slick({
	infinite: true,
	autoplay: false,
	slidesToShow: 1,
	slidesToScroll: 1,
	dots: false,
	fade: true,
	cssEase: "linear",
	arrows: false,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				infinite: true,
				dots: false,
			},
		},
		{
			breakpoint: 900,
			settings: {},
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				dots: false,
				autoplay: false,
				arrows: false,
				autoplaySpeed: 1000,
			},
		},
	],
});

$(".main-testimonios__content").slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 2,
	rows: 2,
	dots: true,
	arrows: true,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true,
			},
		},
		{
			breakpoint: 900,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			},
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,

				autoplaySpeed: 1000,
			},
		},
	],
});

$(".main-testimonios2__content").slick({
	infinite: true,
	slidesToShow: 3,
	slidesToScroll: 2,

	dots: true,
	arrows: true,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true,
			},
		},
		{
			breakpoint: 900,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			},
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,

				autoplaySpeed: 1000,
			},
		},
	],
});
