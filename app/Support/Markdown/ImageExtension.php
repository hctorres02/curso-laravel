<?php

namespace App\Support\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

class ImageExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(Image::class, new class implements NodeRendererInterface
        {
            public function render(Node $node, ChildNodeRendererInterface $childRenderer)
            {
                /** @var Image $node */
                $src = $node->getUrl();
                $alt = htmlspecialchars($node->getAlt(), ENT_QUOTES);

                return "<figure class=\"image\">\n<img src=\"{$src}\" class=\"mx-auto\" alt=\"{$alt}\">\n<figcaption>{$alt}</figcaption>\n</figure>";
            }
        }, 900);
    }
}
