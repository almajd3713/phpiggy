<?php
declare(strict_types = 1);

namespace Framework;

class TemplateEngine {
  public function __construct(private string $basePath){}
  public function render(string $template, array $data = []) {
    // Extracts array data into their own variables
    extract($data, EXTR_SKIP);
    // starts output buffer
    ob_start();
    // Includes the template
    include "{$this->basePath}/{$template}";
    // Store current buffered data;
    $output = ob_get_contents();
    // Cleans the buffer since we already stored it
    ob_end_clean();
    return $output;
  }

}