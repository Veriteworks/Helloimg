<?php

namespace Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Edit;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Model\Auth\Session;
use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\Translate\InlineInterface;

/**
 * Class Tabs
 * @package Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Edit
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * @var InlineInterface
     */
    protected $_translateInline;

    /**
     * Tabs constructor.
     * @param Context $context
     * @param EncoderInterface $jsonEncoder
     * @param Session $authSession
     * @param InlineInterface $translateInline
     * @param array $data
     */
    public function __construct(
        Context $context,
        EncoderInterface $jsonEncoder,
        Session $authSession,
        InlineInterface $translateInline,
        array $data = []
    ) {
        $this->_translateInline = $translateInline;
        parent::__construct($context, $jsonEncoder, $authSession, $data);
    }

    /**
     *
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('helloimg_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Helloimg Tab'));
    }

    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        $this->addTab(
            'level1',
            [
                'label' => __('Level1'),
                'content' => $this->_translateHtml(
                    $this->getLayout()->createBlock(
                        'Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Edit\Tab\Form'
                    )->toHtml()
                )
            ]
        );
            $this->addTab(
                'level2',
                [
                    'label' => __('Level2'),
                    'content' => $this->_translateHtml(
                        $this->getLayout()->createBlock(
                            'Veriteworks\Helloimg\Block\Adminhtml\Helloimg\Edit\Tab\Hoge'
                        )->toHtml()
                    )
                ]
            );
        return parent::_prepareLayout();
    }

    /**
     * @param $html
     * @return mixed
     */
    protected function _translateHtml($html)
    {
        $this->_translateInline->processResponseBody($html);
        return $html;
    }
}
