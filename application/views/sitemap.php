<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc> 
        <priority>1.0</priority>
    </url>

    <!-- My code is looking quite different, but the principle is similar -->
    <?php foreach($sitemaps as $url) { ?>
    <url>        
        <loc>http://surf.az/site/tapdim/<?php echo $url->site_id.$url->slug; ?></loc>
        <changefreq>hourly</changefreq>
        <priority>1</priority>
    </url>
    <?php } ?>

</urlset>