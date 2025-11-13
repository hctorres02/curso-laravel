<?php

namespace App\Support\Markdown;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Extension\Table\Table;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

class TableExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(Table::class, new class implements NodeRendererInterface
        {
            public function render(Node $node, ChildNodeRendererInterface $childRenderer)
            {
                $nodes = $childRenderer->renderNodes($node->children());

                return "<div class=\"table-container\">\n<table class=\"table is-striped is-fullwidth\">{$nodes}</table>\n</div>";
            }
        }, 900);
    }
}
