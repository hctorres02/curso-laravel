<?php

namespace App\Support\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

class EmbedExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(Link::class, new class implements NodeRendererInterface
        {
            public function render(Node $node, ChildNodeRendererInterface $childRenderer)
            {
                /** @var Link $node */
                $url = $node->getUrl();
                $label = trim($childRenderer->renderNodes($node->children()));

                if ($label !== 'embed') {
                    return "<a href=\"{$url}\">{$label}</a>";
                }

                $map = [
                    '/vimeo\.com\/(\d+)/' => 'https://player.vimeo.com/video/%s',
                    '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]+)/' => 'https://www.youtube.com/embed/%s',
                ];

                foreach ($map as $pattern => $format) {
                    $matches = [];

                    preg_match($pattern, $url, $matches);

                    if ($matches) {
                        $url = sprintf($format, $matches[1]);

                        break;
                    }
                }

                return "<figure class=\"box image is-16by9 is-clipped\"><iframe src=\"{$url}\" class=\"has-ratio\" loading=\"lazy\" allowfullscreen></iframe></figure>";
            }
        }, 900);
    }
}
