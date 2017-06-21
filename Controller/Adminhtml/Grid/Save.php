<?php

namespace Veriteworks\Helloimg\Controller\Adminhtml\Grid;

use Veriteworks\Helloimg\Model\GridFactory;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    protected $_gridFactory;
    protected $_uploader;
    protected $_adapterFactory;
    protected $_filesystem;


    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\MediaStorage\Model\File\UploaderFactory $_uploader,
        \Magento\Framework\Image\AdapterFactory $_adapterFactory,
        \Magento\Framework\Filesystem $_filesystem,
        GridFactory $gridFactory
    )
    {
        $this->_gridFactory = $gridFactory;
        $this->_uploader = $_uploader;
        $this->_adapterFactory = $_adapterFactory;
        $this->_filesystem = $_filesystem;

        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->messageManager->addError(__('Problem on saving. Post data is empty.'));
            $this->_redirect('helloimg/grid/index');
            return;
        }
        try {
            $rowData = $this->_gridFactory->create();
            if (isset($data['id'])) {
                $rowData->setImgId($data['id']);
            }
            if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name'])) {
                $base_media_path = 'veriteworks/helloimg/images';
                $_uploader = $this->_uploader->create(
                    ['fileId' => 'image']
                );
                $_uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->_adapterFactory->create();
                $_uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
                $_uploader->setAllowRenameFiles(true);
                $_uploader->setFilesDispersion(true);
                $mediaDirectory = $this->_filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                $result = $_uploader->save(
                    $mediaDirectory->getAbsolutePath($base_media_path));
                $data['image'] = $base_media_path . $result['file'];
            }
            else {
                if (isset($data['image']) && isset($data['image']['value'])) {
                    if (isset($data['image']['delete'])) {
                        $data['image'] = '';
                        $data['delete_image'] = true;
                    } elseif (isset($data['image']['value'])) {
                        $data['image'] = $data['image']['value'];
                    } else {
                        $data['image'] = '';
                    }
                }
            }
            if(isset($data['date_to']) && isset($data['date_from'])){
                $rowData->setDateTo($data['date_to']);
                $rowData->setDateFrom($data['date_from']);
            }
            else{

            }
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('helloimg/grid/index');
    }

    /**
     * Check Category Map permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Veriteworks_Helloimg::add_save');
    }
}