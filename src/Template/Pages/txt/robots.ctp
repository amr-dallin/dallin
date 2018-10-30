User-agent: *
Allow: /
Disallow: /admin/

Sitemap: <?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'sitemap', '_ext' => 'xml'], true); ?>

Host: <?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'display'], true); ?>