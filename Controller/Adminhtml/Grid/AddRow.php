<?php

namespace Veriteworks\Helloimg\Controller\Adminhtml\Grid;

use Magento\Framework\Controller\ResultFactory;
use Veriteworks\Helloimg\Model\GridFactory;

class AddRow extends \Magento\Backend\App\Action
{
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry    $coreRegistry
     */
    protected $_storeManager;
    protected $_gridFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        GridFactory $gridFactory
    )
    {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_gridFactory = $gridFactory;
    }
    /**
     * Add New Row Form page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
//        $websites=$this->_storeManager->getWebsites();

        $rowId = (int) $this->getRequest()->getParam('id');
        $rowData = $this->_gridFactory->create();
        if ($rowId) {
            $rowData = $rowData->load($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getImgId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('helloimg/grid/');
                return;
            }
        }

        $this->_coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Row Data ').$rowTitle : __('Add Row Data');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Veriteworks_Helloimg::add_row');
    }
}